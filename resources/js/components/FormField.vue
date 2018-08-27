<template>
    <default-field :field="field">
        <template slot="field">
            <button v-if="! value" @click.prevent="checkout" class="btn btn-default btn-primary">
                <span v-html="field.label"></span>
            </button>
            <button v-else @click.prevent="cancel" class="btn btn-default btn-danger flex items-center justify-center">
                <icon type="delete" class="text-white" style="margin-right: 7px" />
                <span v-html="field.cancelLabel"></span></button>
        </template>
    </default-field>
</template>

<script>
import { FormField } from 'laravel-nova'

export default {
    mixins: [FormField],

    props: ['resourceName', 'resourceId', 'field'],

    data () {
        return {
            $checkout: null
        }
    },

    mounted () {
        this.initStripe()
    },

    methods: {
        cancel() {
            this.handleChange(null)
        },

        initStripe() {
            this.$checkout = StripeCheckout.configure({
                key: this.field.key,
                locale: this.field.locale,
                name: this.field.company,
                description: this.field.description,
                amount: this.field.amount,
                currency: this.field.currency,
                token: (token) => {
                    this.handleChange(token.id)
                }
            })
        },

        checkout() {
            this.$checkout.open()
        },
    }
}
</script>
