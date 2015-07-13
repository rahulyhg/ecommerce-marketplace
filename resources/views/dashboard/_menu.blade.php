<h3>
    Seller dashboard

    <button type="button" class="btn btn-default btn-sm hide visible-xs-inline" data-toggle="collapse"
            data-target="#dashboard-menu">
        Expand
    </button>
</h3>
<div class="list-group collapse navbar-collapse" id="dashboard-menu">
    <a href="{{ route('my-shop') }}" class="list-group-item">Your account</a>
    <a href="{{ route('coffee-shop.products.index', ['coffee_shop' => current_user()->coffee_shop]) }}"
       class="list-group-item">Your Menu</a>
    <a href="{{ route('current-orders') }}" class="list-group-item">Current orders</a>
    <a href="{{ route('reporting') }}" class="list-group-item">Reporting</a>
    <a href="{{ route('order.history', ['coffee_shop' => current_user()->coffee_shop]) }}" class="list-group-item">
        Order history
    </a>
    <hr class="hidden-xs">
    <a href="{{ url('contact-us') }}" class="list-group-item">Contact us</a>
</div>