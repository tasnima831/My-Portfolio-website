<?php

namespace Tests\Unit;

use Monolog\Level;
use Monolog\LogRecord;
use Tests\TestCase;

class StderrLoggingTest extends TestCase
{
    public function test_stderr_preserves_error_cause_without_multiline_trace(): void
    {
        $handler = app('log')->channel('stderr')->getLogger()->getHandlers()[0];
        $exception = new \RuntimeException('Diagnostic connection failure');
        $record = new LogRecord(new \DateTimeImmutable, 'production', Level::Error,
            $exception->getMessage(), ['exception' => $exception]);

        $output = $handler->getFormatter()->format($record);

        $this->assertStringContainsString('Diagnostic connection failure', $output);
        $this->assertStringContainsString('RuntimeException', $output);
        $this->assertStringNotContainsString('[stacktrace]', $output);
        $this->assertSame(1, substr_count($output, "\n"));
    }
}
