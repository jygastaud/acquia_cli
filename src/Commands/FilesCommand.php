<?php

namespace AcquiaCli\Commands;

use AcquiaCloudApi\Response\EnvironmentResponse;

/**
 * Class FilesCommand
 * @package AcquiaCli\Commands
 */
class FilesCommand extends AcquiaCommand
{
    /**
     * Copies files from one environment to another.
     *
     * @param string              $uuid
     * @param EnvironmentResponse $environmentFrom
     * @param EnvironmentResponse $environmentTo
     *
     * @command files:copy
     */
    public function filesCopy($uuid, EnvironmentResponse $environmentFrom, EnvironmentResponse $environmentTo)
    {
        if ($this->confirm(
            sprintf(
                'Are you sure you want to copy files from %s to %s?',
                $environmentFrom->label,
                $environmentTo->label
            )
        )) {
            $this->say(sprintf('Copying files from %s to %s', $environmentFrom->label, $environmentTo->label));
            $this->copyFiles($uuid, $environmentFrom, $environmentTo);
        }
    }
}
