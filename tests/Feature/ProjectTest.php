<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function test_every_project_has_a_card_link_and_its_own_detail_page(): void
    {
        $home = $this->get('/')->assertOk();

        foreach (config('portfolio.projects') as $project) {
            $url = route('projects.show', $project['slug']);
            $home->assertSee($url);
            $this->get($url)->assertOk()
                ->assertSee('<h1>'.$project['title'].'</h1>', false)
                ->assertSee($project['description'])
                ->assertViewHas('project', $project)
                ->assertDontSee('More projects');
        }
    }

    public function test_unknown_project_returns_not_found(): void
    {
        $this->get('/projects/missing-project')->assertNotFound();
    }

    public function test_optional_details_are_rendered_from_configuration(): void
    {
        config(['portfolio.projects' => [[
            'slug' => 'custom-project', 'title' => 'Custom project', 'description' => 'Custom summary',
            'overview' => 'Full project overview', 'role' => 'Developer', 'timeline' => 'Two weeks',
            'challenge' => 'Project challenge', 'solution' => 'Project solution', 'outcome' => 'Project outcome',
            'features' => ['First feature'], 'image' => 'images/sample-project.svg', 'gallery' => [['image' => 'images/sample-project-desktop.svg', 'caption' => 'Desktop close-up']],
            'demo_url' => 'https://example.com/demo', 'source_url' => 'https://example.com/source',
        ]]]);

        $this->get('/projects/custom-project')->assertOk()
            ->assertSee(['Full project overview', 'Developer', 'Two weeks', 'Project challenge',
                'Project solution', 'Project outcome', 'First feature', 'Desktop close-up',
                'https://example.com/demo', 'https://example.com/source'])
            ->assertDontSee('More projects');
        $this->get('/projects/custom-project')->assertSee('images/sample-project-desktop.svg')
            ->assertSee('data-gallery-select', false)
            ->assertDontSee('Video coming soon')
            ->assertDontSee('<video', false);
    }
}



