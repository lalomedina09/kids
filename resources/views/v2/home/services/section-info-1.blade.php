<section style="background-color: #F3F3F3;">
    <!-- Sección A -->
    @include('v2.home.services.rows.consultancy')

    <!-- Sección B con Manchas Rojas -->
    <div class="position-relative">
        <div class="red-blur"></div>
        <div class="red-blur-secondary"></div>
        @include('v2.home.services.rows.numbers-qd')
    </div>

    <!-- Sección C -->
    @include('v2.home.services.rows.agency')
</section>
