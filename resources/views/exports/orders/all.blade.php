<table>
    <thead>
    <tr>
        <th>Numero</th>
        <th>RemoteID</th>
        <th>Compra</th>
        <th>Método</th>
        <th>Total</th>
        <th>Estatus</th>
        <th>Creado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->number }}</td>
            <td>{{ $order->remote_id }}</td>
            <td>
                <ul class="pl-2">
                    @foreach ($order->items as $item)
                        <li>
                            {{ $item->description }}
                            @if ($item->coupon)
                                <span class="text-muted">(@lang('Coupon'): {{ $item->coupon->code }})</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>{{ $order->method }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->present()->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
