<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcertTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    function canGetFormattedDate()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2016-12-01 8:00pm')
        ]);
        $this->assertEquals('December 1, 2016', $concert->formatted_date);
    }

    /**
     * @test
     */
    function canGetFormattedStartTime()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2016-12-01 17:00:00')
        ]);

        $this->assertEquals('5:00pm', $concert->formatted_start_time);
    }

    /**
     * @test
     */
    function canGetTicketPriceInDollars()
    {
        $concert = factory(Concert::class)->make([
            'ticket_price' => 6750
        ]);
        $this->assertEquals('67.50', $concert->ticket_price_in_dollars);
    }

    /**
     * @test
     */
    function concertsWithAPublishedAtDateArePublished()
    {
        $publishedConcertA = factory(Concert::class)->create(['published_at' => Carbon::parse('-1 week')]);
        $publishedConcertB = factory(Concert::class)->create(['published_at' => Carbon::parse('-1 week')]);
        $unpublishedConcert = factory(Concert::class)->create(['published_at' => null]);

        $publishedConcerts = Concert::published()->get();

        $this->assertTrue($publishedConcerts->contains($publishedConcertA));
        $this->assertTrue($publishedConcerts->contains($publishedConcertB));
        $this->assertFalse($publishedConcerts->contains($unpublishedConcert));
    }
}
