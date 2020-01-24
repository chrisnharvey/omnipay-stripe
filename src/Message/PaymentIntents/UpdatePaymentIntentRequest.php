<?php

/**
 * Stripe Update Paymentintent Request.
 */
namespace Omnipay\Stripe\Message\PaymentIntents;

/**
 * Stripe Update Paymentintent Request.
 *
 * Use this request to update a paymentintent.
 *
 * Example -- note this example assumes that the authorization has been successful
 * and that the payment intent that performed the authorization is held in $paymentIntent.
 * See AuthorizeRequest for the first part of this example transaction:
 *
 * <code>
 *   // Once the payment intent is created we can update it like so:
 *   $updatePaymentIntent = $gateway->update([
 *       'paymentIntentReference' => $purchase->getPaymentIntentReference(),
 *       'description' => 'Hello world',
 *       'metadata' => ['orderId' => 1234],
 *   ));
 *   $response = $$updatePaymentIntent->send();
 * </code>
 *
 * @see AuthorizeRequest
 * @link https://stripe.com/docs/api/payment_intents/update
 */
class UpdatePaymentIntentRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('paymentIntentReference');

        $data = array();

        if ($description = $this->getParameter('description')) {
            $data['description'] = $description;
        }

        if ($metadata = $this->getParameter('metadata')) {
            $data['metadata'] = $metadata;
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/payment_intents/'.$this->getPaymentIntentReference();
    }

    /**
     * @inheritdoc
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
