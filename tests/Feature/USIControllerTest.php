<?php

namespace Tests\Feature;

use App\Services\USIService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class USIControllerTest extends TestCase
{
    private $usiServiceMock;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a mock for USIService
        $this->usiServiceMock = $this->createMock(USIService::class);
        $this->app->instance(USIService::class, $this->usiServiceMock);
    }

    public function testVerifyUSISuccess()
    {
        // Arrange
        $data = [
            'usi' => 'BNGH7C75FN',
            'first_name' => 'Maryam',
            'family_name' => 'Fredrick',
            'date_of_birth' => '1966-05-25',
        ];

        $this->usiServiceMock->method('hasExpired')->willReturn(false);
        $this->usiServiceMock->method('verifyUSI')->willReturn([
            'status' => true,
            'message' => 'Verification successful.',
        ]);

        // Act
        $response = $this->postJson('/usi-verify', $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => true,
            'message' => 'Verification successful.',
        ]);
    }

    public function testVerifyUSIExpired()
    {
        // Arrange
        $data = [
            'usi' => 'BNGH7C75FN',
            'first_name' => 'Maryam',
            'family_name' => 'Fredrick',
            'date_of_birth' => '1966-05-25',
        ];

        $this->usiServiceMock->method('hasExpired')->willReturn(true);

        // Act
        $response = $this->postJson('/usi-verify', $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => false,
            'msg' => 'Key store has expired quitting',
        ]);
    }

    public function testVerifyBulkUSISuccess()
    {
        // Arrange
        $data = [
            [
                "record_id" => 1,
                "usi" => "BNGH7C75FN",
                "first_name" => "Maryam",
                "family_name" => "Fredrick",
                "date_of_birth" => "1966-05-25"
            ],
            [
                "record_id" => 2,
                "usi" => "C2P5P4UBHP",
                "first_name" => "Nicholas",
                "family_name" => "Koke",
                "date_of_birth" => "1990-07-02"
            ],
            [
                "record_id" => 3,
                "usi" => "BJRVU7U59N",
                "first_name" => "Nick",
                "family_name" => "Smithdd",
                "date_of_birth" => "1990-07-14"
            ]
        ];

        $this->usiServiceMock->method('hasExpired')->willReturn(false);
        $this->usiServiceMock->method('verifyBulkUSI')->willReturn([
            'status' => true,
            'message' => 'Bulk verification successful.',
        ]);

        // Act
        $response = $this->postJson('/usi-bulk-verify', $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => true,
            'message' => 'Bulk verification successful.',
        ]);
    }

    public function testVerifyBulkUSIExpired()
    {
        // Arrange
        $data = [
            [
                "record_id" => 1,
                "usi" => "BNGH7C75FN",
                "first_name" => "Maryam",
                "family_name" => "Fredrick",
                "date_of_birth" => "1966-05-25"
            ],
            [
                "record_id" => 2,
                "usi" => "C2P5P4UBHP",
                "first_name" => "Nicholas",
                "family_name" => "Koke",
                "date_of_birth" => "1990-07-02"
            ],
            [
                "record_id" => 3,
                "usi" => "BJRVU7U59N",
                "first_name" => "Nick",
                "family_name" => "Smithdd",
                "date_of_birth" => "1990-07-14"
            ]
        ];

        $this->usiServiceMock->method('hasExpired')->willReturn(true);

        // Act
        $response = $this->postJson('/usi-bulk-verify', $data);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => false,
            'msg' => 'Key store has expired quitting',
        ]);
    }
}