<?php

namespace Tests\Feature;

use App\Models\SalesLead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $lead = SalesLead::create([
            'title' => 'First Lead',
            'message' => 'Please call the customer back urgently',
        ]);

        $tag = $lead->tags()->create([
            'name' => 'warm',
        ]);

        $this->assertDatabaseHas('sales_tags', [
            'id' => $tag->id,
        ]);

        $this->assertDatabaseHas('sales_lead_sales_tag', [
            'sales_lead_id' => $lead->id,
            'salesTagId' => $tag->id,
        ]);
    }
}
