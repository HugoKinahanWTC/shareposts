<?php

declare(strict_types=1);

function redirect(string $page): string {
    header('location: '. URLROOT . '/' . $page);
}