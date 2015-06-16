@extends('app')

@section('page-title')
    Your coffee shop
@endsection

@section('content')
    <div class="container-fluid">
        @include('dashboard._header')
        <div class="row">
            <div class="col-sm-3">
                <h3>
                    Seller dashboard

                    <button type="button" class="btn btn-default btn-sm hide visible-xs-inline" data-toggle="collapse"
                            data-target="#dashboard-menu">
                        Expand
                    </button>
                </h3>
                <div class="list-group collapse navbar-collapse" id="dashboard-menu">
                    <a href="#" class="list-group-item">Your account</a>
                    <a href="{{ route('coffee-shop.products.index', ['coffee_shop' => $coffeeShop]) }}"
                       class="list-group-item">Menu</a>
                    <a href="#" class="list-group-item">Reporting</a>
                    <a href="{{ route('order.history', ['coffee_shop' => $coffeeShop]) }}" class="list-group-item">
                        Order history
                    </a>
                    <hr class="hidden-xs">
                    <a href="{{ url('contact-us') }}" class="list-group-item">Contact us</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Current orders</h2>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Order</th>
                                <th>Name</th>
                                <th>Collection time</th>
                                <th>Order status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        @foreach($order->order_lines as $line)
                                            @if($line->product->type == 'drink')
                                                {{ $coffeeShop->getSizeDisplayName($line->size) }}
                                            @endif
                                            {{ $coffeeShop->getNameFor($line->product) }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $order->user->name }}
                                    </td>
                                    <td>
                                        {{ $order->pickup_time }}
                                    </td>
                                    <td>
                                        {{ $order->status }}
                                        <a href="{{ route('next-order-status', [ $order ]) }}"
                                           class="btn btn-success btn-xs pull-right">Set as {{ $order->getNextStatus() }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <h2>Most bought products</h2>
                        <ul class="list-group">
                            @foreach($mostBought as $product)
                                <li class="list-group-item">
                                    {{$coffeeShop->getNameFor($coffeeShop->findProduct($product->product_id))}}:
                                    {{$product->aggregate}} times
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
