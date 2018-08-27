# A Stripe Checkout Button for Laravel Nova

This package contains a Nova field to add Stripe Checkout buttons to your forms & actions.

![screenshot of the Stripe Checkout Button field](https://i.imgur.com/m6pZEeu.png)

## Requirements

This field requires a Stripe API Key to work.

## Installation

Install this package in your Laravel app via composer:

```bash
composer require depsimon/nova-stripe-checkout-field
```

## Usage

You can use this field in your forms and in your actions. Here's how I use it in a `PublishJob` action that requires a Stripe Token.

```php
\\ app\Nova\Actions\PublishJob.php
\\ use Depsimon\NovaStripeCheckoutField\NovaStripeCheckoutField;

public function fields()
{
    return [
        NovaStripeCheckoutField::make('Regular', 'regular_token')
            ->amount(9999)
            ->currency('eur')
            ->company('Nova Jobs')
            ->description('Regular Job Posting for 60 days')
            ->label('Checkout Regular Posting for 99€'),

        NovaStripeCheckoutField::make('Premium', 'premium_token')
            ->amount(19999)
            ->currency('eur')
            ->company('Nova Jobs')
            ->description('Premium Job Posting for 60 days')
            ->label('Checkout Premium Posting for 129€'),
    ];
}
```

The field will automatically get the Stripe API key from the 'services.stripe.key' config, but you can override it by using the `key($key)` method on the field.

You can also set the amount (`amount($amount)`), currency (`currency($currency)`), locale (`locale($locale)`), company name (`company($company)`), image (`image($image)`), product description (`description($description)`), checkout button label (`label($label)`), cancel button label (`cancelLabel($cancelLabel)`).

The Stripe Token for the Checkout will be available in the field with the name you chose. In my case, it will be `regular_token` or `premium_token`.


![screenshot of the Stripe Checkout Button field in action](https://i.imgur.com/jnPswNA.png)
![screenshot of the Stripe Checkout Button field in action](https://i.imgur.com/YyABV5g.pnga)

## Credits

- [Simon Depelchin](https://github.com/depsimon)

## License

The MIT License (MIT).
