<?php

namespace Tests\Feature;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    private function inquiry(): array
    {
        return ['name' => 'Visitor', 'email' => 'visitor@example.com', 'project_type' => 'Website development', 'message' => 'Please build my portfolio website.'];
    }

    public function test_valid_inquiry_uses_owner_recipient_and_visitor_reply_to(): void
    {
        config(['portfolio.contact_email' => 'owner@gmail.com']);
        $mailer = \Mockery::mock(Mailer::class);
        Mail::shouldReceive('mailer')->once()->with('smtp')->andReturn($mailer);
        $mailer->shouldReceive('send')->once()->with('emails.project-inquiry', ['inquiry' => $this->inquiry()], \Mockery::on(function ($callback) {
            $message = new Message(new \Symfony\Component\Mime\Email);
            $callback($message);
            $this->assertSame('owner@gmail.com', $message->getSymfonyMessage()->getTo()[0]->getAddress());
            $this->assertSame('visitor@example.com', $message->getSymfonyMessage()->getReplyTo()[0]->getAddress());
            return true;
        }));
        $this->post('/contact', $this->inquiry())->assertRedirect('/#contact')->assertSessionHas('contact_success');
    }

    public function test_form_renders_and_sends_the_message_body(): void
    {
        config(['portfolio.contact_email' => 'owner@gmail.com', 'mail.mailers.smtp.transport' => 'array']);
        $this->post('/contact', $this->inquiry())->assertSessionHas('contact_success')->assertSessionHasNoErrors();
        $sent = Mail::mailer('smtp')->getSymfonyTransport()->messages();
        $this->assertCount(1, $sent);
        $this->assertStringContainsString($this->inquiry()['message'], $sent->first()->getOriginalMessage()->getHtmlBody());
    }

    public function test_invalid_input_does_not_send_mail(): void
    {
        Mail::shouldReceive('mailer')->never();
        $this->post('/contact', ['email' => 'invalid'])->assertSessionHasErrors(['name', 'email', 'project_type', 'message']);
    }

    public function test_delivery_failure_preserves_input_without_success(): void
    {
        config(['portfolio.contact_email' => 'owner@gmail.com']);
        Mail::shouldReceive('mailer')->once()->andThrow(new \RuntimeException('SMTP unavailable'));
        $this->post('/contact', $this->inquiry())->assertSessionHasErrors('delivery')->assertSessionMissing('contact_success')->assertSessionHasInput('name', 'Visitor');
    }
}
