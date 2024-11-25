<style>

    .bg-adviento {
        background-image: url('/images/games/bg-white.jpg');
        background-size: cover;
        background-position: center;
    }

    .advent-calendar {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .advent-calendar .calendar-item {
        /*width: 18%;*/
        padding: 10px;
        position: relative;
        perspective: 1000px;
        margin: 5px;
        cursor: pointer;
    }

    .calendar-item-inner {
        position: relative;
        width: 90%;
        height: 165px;
        transform-style: preserve-3d;
        transition: transform 0.6s;
    }

    .calendar-item:hover .calendar-item-inner {
        transform: rotateY(180deg);
    }

    .calendar-front,
    .calendar-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 10px;
        overflow: hidden;
    }

    .calendar-front {
        background-color: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        background-size: cover;
        background-position: center;
        color: #fff;
        font-size: 24px;
        font-weight: bold;
    }

    .calendar-back {
        background-color: #f8c291;
        background-size: cover;
        background-position: center;
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 16px;
        text-align: center;
        padding: 10px;
    }
</style>
<div class="bg-adviento">
    <div class="container text-center ">
        <img src="/images/games/titulo.png" width="70%" alt="Titulo" style="margin-top: 5%; margin-bottom:5%;">
        <div class="row advent-calendar">
            <!-- Casillas del calendario se generan aquí -->
        </div>
    </div>
</div>

<script>
    const items = [
        { img: '/images/games/graficos/1.jpg', img2: '/images/games/textos/1.jpg' },
        { img: '/images/games/graficos/2.jpg', img2: '/images/games/textos/2.jpg' },
        { img: '/images/games/graficos/3.jpg', img2: '/images/games/textos/3.jpg' },
        { img: '/images/games/graficos/4.jpg', img2: '/images/games/textos/4.jpg' },
        { img: '/images/games/graficos/5.jpg', img2: '/images/games/textos/5.jpg' },
        { img: '/images/games/graficos/6.jpg', img2: '/images/games/textos/6.jpg' },
        { img: '/images/games/graficos/7.jpg', img2: '/images/games/textos/7.jpg' },
        { img: '/images/games/graficos/8.jpg', img2: '/images/games/textos/8.jpg' },
        { img: '/images/games/graficos/9.jpg', img2: '/images/games/textos/9.jpg' },
        { img: '/images/games/graficos/10.jpg', img2: '/images/games/textos/10.jpg' },
        { img: '/images/games/graficos/11.jpg', img2: '/images/games/textos/11.jpg' },
        { img: '/images/games/graficos/12.jpg', img2: '/images/games/textos/12.jpg' },
        { img: '/images/games/graficos/13.jpg', img2: '/images/games/textos/13.jpg' },
        { img: '/images/games/graficos/14.jpg', img2: '/images/games/textos/14.jpg' },
        { img: '/images/games/graficos/15.jpg', img2: '/images/games/textos/15.jpg' },
        { img: '/images/games/graficos/16.jpg', img2: '/images/games/textos/16.jpg' },
        { img: '/images/games/graficos/17.jpg', img2: '/images/games/textos/17.jpg' },
        { img: '/images/games/graficos/18.jpg', img2: '/images/games/textos/18.jpg' },
        { img: '/images/games/graficos/19.jpg', img2: '/images/games/textos/19.jpg' },
        { img: '/images/games/graficos/20.jpg', img2: '/images/games/textos/20.jpg' },
        { img: '/images/games/graficos/21.jpg', img2: '/images/games/textos/21.jpg' },
        { img: '/images/games/graficos/22.jpg', img2: '/images/games/textos/22.jpg' },
        { img: '/images/games/graficos/23.jpg', img2: '/images/games/textos/23.jpg' },
        { img: '/images/games/graficos/24.jpg', img2: '/images/games/textos/24.jpg' },
        { img: '/images/games/graficos/25.jpg', img2: '/images/games/textos/25.jpg' },
    ];

    const container = document.querySelector('.advent-calendar');

    items.forEach((item, index) => {
        const card = document.createElement('div');
        card.classList.add('calendar-item', 'col-xs-4', 'col-sm-3', 'col-md-2');

        card.innerHTML = `
            <div class="calendar-item-inner">
                <div class="calendar-front" style="background-image: url('${item.img}');">
                    <span style="color: transparent;">${index + 1}</span>
                </div>
                <div class="calendar-back" style="background-image: url('${item.img2}');">
                    <span style="color: transparent;">${index + 1}</span>
                </div>
            </div>
        `;

        container.appendChild(card);
    });
</script>

