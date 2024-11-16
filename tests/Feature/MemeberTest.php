<?php

use Database\Factories\MemberFactory;

it('can list all members', function () {

    MemberFactory::new()->count(5)->create();

    $response = $this->getJson(route('members.index'));

    $response->assertStatus(200);

    $this->assertCount(5, $response->json()['data']);
});


it('can show a member', function () {

    $member =  MemberFactory::new()->create();

    $response = $this->getJson(route('members.show',  $member->id));

    $response->assertStatus(200);

    $response->assertJson([
        'data' => [
            'id' => $member->id,
            'name' => $member->name,
            'email' => $member->email,
            'mobile_number' => $member->mobile_number,
            'age' => $member->age,
            'title' => $member->title,
        ],
    ]);
});


it('can store a new member', function () {

    $member =   [
        'name' => 'Ahmed Shahwan',
        'email' => 'mohye@gmail.com',
        'title' => 'Dr',
        'age' => 30,
        'mobile_number' => '9876543210',
    ];
    $response = $this->postJson(route('members.store'), $member);

    $response->assertStatus(200);

    $response->assertJson(['success' => 'memeber created successfull']);

    $this->assertDatabaseHas('memebers', [
        'email' => $member['email'],
    ]);
});


it('can update a member', function () {

    $member = MemberFactory::new()->create();

    $updatedMembers = [
        'name' => 'Ahmed Shahwan',
        'email' => 'mohye@gmail.com',
        'title' => 'Dr',
        'age' => 30,
        'mobile_number' => '9876543210',
    ];

    $response = $this->putJson(route('members.update', $member->id), $updatedMembers);

    $response->assertStatus(200);

    $this->assertDatabaseHas('memebers', ['email' => $updatedMembers['email']]);
});

it('can delete a member', function () {

    $member = MemberFactory::new()->create();

    $response = $this->deleteJson(route('members.delete', $member->id));

    $response->assertStatus(201);

    $this->assertDatabaseMissing('memebers', ['email' => $member->email]);
});
