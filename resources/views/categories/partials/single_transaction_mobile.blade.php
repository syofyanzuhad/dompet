<span class="pull-right">{{ $transaction->amount_string }}</span>
{{ $transaction->date }}
<div>
    {{ $transaction->description }}
    @can('update', $transaction)
        {!! link_to_route(
            'categories.show',
            __('app.edit'),
            [$category->id, 'action' => 'edit', 'id' => $transaction->id] + request(['start_date', 'end_date', 'query', 'partner_id']),
            ['id' => 'edit-transaction-'.$transaction->id, 'class' => 'pull-right text-danger']
        ) !!}
    @endcan
</div>
<div>{!! optional($transaction->partner)->name_label !!}</div>
<div>{!! optional($transaction->loan)->type_label !!}</div>
<hr style="margin: 6px 0">
