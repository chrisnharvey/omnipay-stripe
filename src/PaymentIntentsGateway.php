<?php

/**
 * Stripe Payment Intents Gateway.
 */
namespace Omnipay\Stripe;

use Omnipay\Stripe\Message\PaymentIntents\Response;

/**
 * Stripe Payment Intents Gateway.
 *
 * @see \Omnipay\Stripe\AbstractGateway
 * @see \Omnipay\Stripe\Message\AbstractRequest
 *
 * @link https://stripe.com/docs/api
 *
 */
class PaymentIntentsGateway extends AbstractGateway
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Stripe Payment Intents';
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\AuthorizeRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * In reality, we're confirming the payment intent.
     * This method exists as an alias to in line with how Omnipay interfaces define things.
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\ConfirmPaymentIntentRequest
     */
    public function completeAuthorize(array $options = [])
    {
        return $this->confirm($options);
    }

    /**
     * Update charge request.
     * Update the data for a charge after the charge has been created.
     *
     *
     * @param array $parameters
     * @return \Omnipay\Stripe\Message\Response
     *
     */
    public function updateCharge(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\UpdateChargeRequest', $parameters);
    }

    /**
     * @deprecated 2.3.3:3.0.0 duplicate of \Omnipay\Stripe\Gateway::fetchTransaction()
     * @see \Omnipay\Stripe\Gateway::fetchTransaction()
     * @param array $parameters
     * @return \Omnipay\Stripe\Message\FetchChargeRequest
     */
    public function fetchCharge(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\FetchChargeRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\CaptureRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\UpdatePaymentIntentRequest
     */
    public function update(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\UpdatePaymentIntentRequest', $parameters);
    }

    /**
     * Confirm a Payment Intent. Use this to confirm a payment intent created by a Purchase or Authorize request.
     *
     * @param array $parameters
     * @return \Omnipay\Stripe\Message\PaymentIntents\ConfirmPaymentIntentRequest
     */
    public function confirm(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\ConfirmPaymentIntentRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\PurchaseRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * In reality, we're confirming the payment intent.
     * This method exists as an alias to in line with how Omnipay interfaces define things.
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\ConfirmPaymentIntentRequest
     */
    public function completePurchase(array $options = [])
    {
        return $this->confirm($options);
    }

    /**
     * Fetch a payment intent. Use this to check the status of it.
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\FetchPaymentIntentRequest
     */
    public function fetchPaymentIntent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\FetchPaymentIntentRequest', $parameters);
    }

    //
    // Cards
    // @link https://stripe.com/docs/api/payment_methods
    //

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\CreatePaymentMethodRequest
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\CreatePaymentMethodRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\CreatePaymentMethodRequest
     */
    public function attachCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\AttachPaymentMethodRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\UpdatePaymentMethodRequest
     */
    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\UpdatePaymentMethodRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\PaymentIntents\DetachPaymentMethodRequest
     */
    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\PaymentIntents\DetachPaymentMethodRequest', $parameters);
    }
}