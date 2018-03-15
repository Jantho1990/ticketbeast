<?php

namespace Tests\Feature;

use App\Concert;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseTicketsTest extends TestCase
{
    /**
     * @test
     */
    function customerCanPurchaseConcertTickets()
    {
        // Arrange
        // Create a concert
        $concert = factory(Concert::class)->create(['price' => 3250]);

        // ACt
        // Purchase tickets
        $this->json('POST', "/concerts/{$concert->id}/orders", [
            'email' => 'john@example.com',
            'ticket_quantity' => 3,
            'payment_token' => $paymentGateway->getValidTestToken(),
        ]);

        // Assert
        // Make sure customer was charged correct amount
        $this->assertEquals(9750, $paymentGateway->totalCharges());

        // Make sure that an order exists for this customer.
        $order = $concert->orders()->where('email', 'john@example.com')->first();
        $this->assertNotNull($order);
        $this->assertEquals(3, $order->tickets->count());
    }
}
