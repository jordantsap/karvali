@component('mail::message')
# Λάβαμε την παραγγελία σας, ευχαριστούμε!

**Κωδικός παραγγελίας:** {{ $order->id }}

**Μέιλ παραγγελίας:** {{ $order->billing_email }}

**Όνομα Παραγγελίας:** {{ $order->billing_name }}

**Μερικό ποσό:** ${{ round($order->billing_subtotal, 2) }}

**Τελικό ποσό:** ${{ number_format($order->billing_total, 2) }}
<hr>
**Προϊόντα στην παραγγελία**
<hr>
@foreach ($order->products as $product)
Προϊόν: {{ $product->title }} <br>
Καταστημα: {{ $product->company->title}} <br>
Τιμή: ${{ round($product->price, 2)}}<br>
Ποσότητα: {{ $product->pivot->quantity }} <br>
<hr>
@endforeach

Περαιτέρω λεπτομέρειες στην ιστοσελίδα μας.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Προς την στοσελίδα
@endcomponent

Ευχαριστούμε ξανά για την προτίμησή σας.

Με εκτίμηση,<br>
{{ config('app.name') }}
@endcomponent
