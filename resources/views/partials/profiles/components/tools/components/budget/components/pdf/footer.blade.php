<table>
    <tr>
        <td class="small" valign="top" width="60%">
            <p>
                <span class="strong">¿Tienes alguna duda?</span> Comunícate con nosotros:
            </p>

            <p>Por teléfono:</p>
            <ul>
                @if(false)<li>CDMX: <span class="strong">{{ config('money.phone.cdmx') }}</span></li>@endif
                <li>Monterrey: <span class="strong">{{ config('money.phone.mty') }}</span></li>
            </ul>

            <p>Por correo electrónico: <span class="strong">{{ config('money.email') }}</p>

            <p>En nuestras redes sociales:</p>
            <ul>
                <li><span style="color:#4a7db7;">Facebook:</span> <span class="strong">{{ config('money.url.facebook') }}</span></li>
                <li><span style="color:#3cafc1;">Twitter:</span> <span class="strong">{{ config('money.url.twitter') }}</span></li>
                <li><span style="color:#800080;">Instagram:</span> <span class="strong">{{ config('money.url.instagram') }}</span></li>
            </ul>

            <p>
                Horarios de atención:
                <br>
                <span class="strong">{{ config('money.schedule') }}</span>
            </p>
        </td>

        <td class="small" valign="top" width="40%">
            <p class="strong">Importante:</p>
            <li>Este documento no es una factura fiscal.</li>
            <li>Recuerde conservar su comprobante de pago.</li>
        </td>
    </tr>
</table>
