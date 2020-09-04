@extends('layouts.app')
@section('titulo', 'Eventos')
@section('content')
<div class="row justify-content-center">
    <div class="container col-11 col-md-10 col-lg-7 m-0">
        <h2 class="fadeInDown" data-anime="150">Eventos</h2>

        <div class="d-flex flex-column">

            @if (count($registros) < 1)
                <p>Ops, ainda não temos nenhum evento</p>
            @else
        
            <div class="d-flex flex-wrap justify-content-center">
                   
                @foreach ($registros as $registro)
                    @include('site.postagens._card')
                @endforeach

            </div>
            @endif
            
            <div class="d-flex justify-content-center fadeInDown" data-anime="300">
                {{ $registros->links() }}
            </div>                            
        </div>
    </div>
    <div class="container col-11 col-md-8 col-lg-3 m-0">
        <h2 class="fadeInDown" data-anime="150">Agenda de eventos</h2>
        <div id="full-clndr" class="clearfix fadeInDown" data-anime="300">
        <p class="no-javascript">O Javascript não está habilitado no seu navegador, agenda não está disponível sem Javascript</p>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var agenda = {!! json_encode($agenda) !!};
    </script>
    <script id="calendar-template" type="text/template">
            <div class="clndr-controls">
                <div class="clndr-previous-button">
                    <span class="fas fa-chevron-left"></span>
                </div>
                <div class="clndr-next-button">
                    <span class="fas fa-chevron-right"></span>
                </div>
                <div class="current-month">
                    <%= month %> <%= year %>
                </div>
            </div>
            <div class="calendar">
                <div class="clndr-grid">
                    <div class="days-of-the-week clearfix">
                        <% _.each(daysOfTheWeek, function(day) { %>
                        <div class="header-day">
                            <%= day %>
                        </div>
                        <% }); %>
                    </div>
                    <div class="days">
                        <% _.each(days, function(day) { %>
                        <div class="<%= day.classes %>" id="<%= day.id %>">
                            <span class="day-number"><%= day.day %></span>
                        </div>
                        <% }); %>
                    </div>
                </div>
                <div class="event-listing p-0">
                    <div class="event-listing-title d-flex text-center">
                        <div class="x-button pointer">
                            <span class="fas fa-times"></span>
                        </div>
                        <p class="w-100 m-0">Eventos deste mês</p>
                    </div>
                    <% _.each(eventsThisMonth, function(event) { %>
                    <div class="event-item">
                        <div class="event-item-location text-left">
                            <a href="{{ URL::to('site/eventos/visualizar') }}/<%= event.location %>"><strong><%= event.title %></strong><br></a>
                            <%= moment(event.date).format('ddd, DD [de] MMMM') + ' - ' + ((event.hora_final == null) ? 'às ' + event.hora_inicial : 'das ' + event.hora_inicial + ' às ' + event.hora_final) %>
                            <br>
                        </div>
                    </div>
                    <% }); %>
                </div>
            </div>
        </div>
    </script>
    <script>
        $("#full-clndr").clndr({
            template: $("#calendar-template").html(),
            daysOfTheWeek: ["D", "S", "T", "Q", "Q", "S", "S"],
            showAdjacentMonths: true,
            adjacentDaysChangeMonth: true,
            events: agenda,
            clickEvents: {
            click: function(target) {
                if(target.events.length) {
                    var eventListing = $("#full-clndr").find(".calendar");
                    eventListing.toggleClass("show-events", true);
                    $("#full-clndr").find(".x-button").click( function() {
                        eventListing.toggleClass("show-events", false);
                    });
                    }
                }
            },
        });
    </script>

@endsection