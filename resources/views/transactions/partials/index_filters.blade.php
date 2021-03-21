{{ Form::open(['method' => 'get','class' => 'form-inline']) }}
    {!! Form::text('query', request('query'), ['class' => 'form-control input-sm mr-2', 'placeholder' => __('transaction.search_text')]) !!}
    {{ Form::select('date', get_dates(), $date, ['class' => 'form-control input-sm mr-2', 'placeholder' => '--']) }}
    {{ Form::select('month', get_months(), $month, ['class' => 'form-control input-sm mr-2']) }}
    {{ Form::select('year', get_years(), $year, ['class' => 'form-control input-sm mr-2']) }}
    {{ Form::select('category_id', $categories, request('category_id'), ['placeholder' => __('category.all'), 'class' => 'form-control input-sm mr-2']) }}
    {{ Form::select('partner_id', $partners, request('partner_id'), ['placeholder' => __('partner.all'), 'class' => 'form-control input-sm mr-2']) }}
    {{ Form::submit(__('app.submit'), ['class' => 'btn btn-primary mr-2']) }}
    {{ link_to_route('transactions.index', __('app.reset'), [], ['class' => 'btn btn-secondary mr-2']) }}
    {{ link_to_route('transactions.exports.csv', __('transaction.download'), request()->all(), ['class' => 'btn btn-info']) }}
{{ Form::close() }}
