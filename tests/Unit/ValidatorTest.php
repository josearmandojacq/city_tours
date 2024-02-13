<?php

use Core\Validator;

it('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});