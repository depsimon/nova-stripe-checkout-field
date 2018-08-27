<?php

namespace Depsimon\NovaStripeCheckoutField;

use Laravel\Nova\Fields\Field;

class NovaStripeCheckoutField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-stripe-checkout-field';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->key(config('services.stripe.key'))
             ->company(config('app.name'))
             ->locale('auto')
             ->label('Checkout')
             ->cancelLabel('Cancel');
    }

    /**
     * Set the Stripe API key.
     *
     * @param  string  $key
     * @return $this
     */
    public function key($key)
    {
        return $this->withMeta(['key' => $key]);
    }

    /**
     * Set the relative or absolute URL pointing to a square image of your brand or product.
     * The recommended minimum size is 128x128px.The supported image types are: .gif, .jpeg, and .png.
     *
     * @param  string  $image
     * @return $this
     */
    public function image($image)
    {
        return $this->withMeta(['image' => $image]);
    }

    /**
     * Set the name of your company or website.
     *
     * @param  string  $company
     * @return $this
     */
    public function company($company)
    {
        return $this->withMeta(['company' => $company]);
    }

    /**
     * Set the description of the product or service being purchased.
     *
     * @param  string  $description
     * @return $this
     */
    public function description($description)
    {
        return $this->withMeta(['description' => $description]);
    }

    /**
     * Set the amount (in cents) that's shown to the user.
     * Note that you will still have to explicitly include the amount when you create a charge using the API.
     * (You will also need to provide Checkout with a data-currency value to change the default of USD.)
     *
     * @param  string  $amount
     * @return $this
     */
    public function amount($amount)
    {
        return $this->withMeta(['amount' => $amount]);
    }

    /**
     * Set the currency.
     *
     * @param  string  $currency
     * @return $this
     */
    public function currency($currency)
    {
        return $this->withMeta(['currency' => $currency]);
    }

    /**
     * Set the locale.
     *
     * @param  string  $locale
     * @return $this
     */
    public function locale($locale)
    {
        return $this->withMeta(['locale' => $locale]);
    }

    /**
     * Set the label of the checkout button.
     *
     * @param  string  $label
     * @return $this
     */
    public function label($label)
    {
        return $this->withMeta(['label' => $label]);
    }

    /**
     * Set the label of the cancel button.
     *
     * @param  string  $cancelLabel
     * @return $this
     */
    public function cancelLabel($cancelLabel)
    {
        return $this->withMeta(['cancelLabel' => $cancelLabel]);
    }
}
