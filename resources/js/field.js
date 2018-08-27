Nova.booting((Vue, router) => {
    Vue.component('form-nova-stripe-checkout-field', require('./components/FormField'));

    const script = document.createElement('script');
    script.src = 'https://checkout.stripe.com/checkout.js';
    document.getElementsByTagName('head')[0].appendChild(script);
})
