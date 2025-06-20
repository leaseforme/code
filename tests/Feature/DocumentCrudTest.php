<?php

namespace Tests\Feature;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_document()
    {
        $document = Document::factory()->create();

        $this->assertDatabaseHas('documents', [
            'id' => $document->id,
        ]);
    }

    /** @test */
    public function it_can_update_a_document()
    {
        $document = Document::factory()->create();
        $document->update(['name' => 'updated.pdf']);

        $this->assertDatabaseHas('documents', [
            'id' => $document->id,
            'name' => 'updated.pdf',
        ]);
    }

    /** @test */
    public function it_can_delete_a_document()
    {
        $document = Document::factory()->create();
        $document->delete();

        $this->assertDatabaseMissing('documents', [
            'id' => $document->id,
        ]);
    }
}
