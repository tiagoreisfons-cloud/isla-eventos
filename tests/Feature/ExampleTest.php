<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the profile page shows the number of interests', function () {
    $response = $this->get('/perfil');

    $response->assertStatus(200)
        ->assertSeeText('Interesses (3)');
});
