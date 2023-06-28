<table>
    <tr>
        <td colspan="6" style="height:20px;"></td>
    </tr>

    <tr>
        <td class="header bg-main color-white" colspan="6">
            DETALLE DE LA ORDEN DE COMPRA
        </td>
    </tr>

    <tr>
        <td class="strong" colspan="6">
            Número de orden de compra:
            <span class="">{{ $order->number }}</span>
        </td>
    </tr>

    <tr>
        <th class="header small">Producto</th>
        <th class="header small">Precio</th>
        <th class="header small">Descuento</th>
        <th class="header small">Subtotal</th>
        <th class="header small">Cantidad</th>
        <th class="header small">Total</th>
    </tr>

    {{--
    @foreach($order->items as $item)
        <tr>
            <td class="small" valign="middle" width="45%">
                {{ $item->name }}
            </td>
            <td class="small fed-color-main" style="text-align:center;" valign="middle">
                {{ $item->present()->price }}
            </td>
            <td class="small" style="text-align:center;" valign="middle">
                {{ $item->present()->discount }}
            </td>
            <td class="small fed-color-main" style="text-align:center;" valign="middle">
                {{ $item->present()->subtotal }}
            </td>
            <td class="small" style="text-align:center;" valign="middle">
                {{ $item->present()->quantity }}
            </td>
            <td class="small strong fed-color-main" style="text-align:center;" valign="middle">
                {{ $item->present()->total }}
            </td>
        </tr>
    @endforeach
    --}}
    <tr>
        <td colspan="6">
            <hr>
        </td>
    </tr>

    <tr>
        <td class="strong" colspan="4" style="text-align:right;">
            Total <span class="small">(impuestos incluidos) :</span>
        </td>
        <td class="strong color-main" style="text-align:center;">
            {{-- $order->present()->total --}}
        </td>
    </tr>
    {{--@if (false)
    <tr>
        <td class="small strong" colspan="4" style="text-align:right;">
            Ahorro :
        </td>
        <td class="strong small color-main" style="text-align:center;">
            0
        </td>
    </tr>
    @endif--}}
    {{--@if(!$order->is_paid)
        <tr>
            <td class="strong" colspan="6" style="height:20px;"></td>
        </tr>
        <tr>
            <td class="strong" colspan="6" style="text-align:center;">
                Pagar antes del {{ $order->present()->expiration_date_human }}
            </td>
        </tr>
    @endif--}}
</table>
