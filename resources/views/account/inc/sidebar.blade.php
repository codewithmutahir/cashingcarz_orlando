@php
    use Illuminate\Support\Str;
    
    // Initialize accountMenu safely
    if (!isset($accountMenu) || !($accountMenu instanceof \Illuminate\Support\Collection)) {
        $accountMenu = collect();
    }
    
    if (!$accountMenu->has('My Account')) {
        $accountMenu->put('My Account', []);
    }
    
    $myAccountItems = collect($accountMenu->get('My Account'));

    // Only add menu items if routes exist
    try {
        if (!$myAccountItems->pluck('name')->contains('My Referrals') && Route::has('referrals.index')) {
            $accountMenu['My Account'][] = [
                'name'     => 'My Referrals',
                'url'      => route('referrals.index'),
                'icon'     => 'fa fa-users',
                'isActive' => request()->is('account/referrals'),
            ];
        }
    } catch (Exception $e) {
        // Route doesn't exist, skip
    }

    try {
        if (!$myAccountItems->pluck('name')->contains('Withdrawals') && Route::has('withdrawals.index')) {
            $accountMenu['My Account'][] = [
                'name'     => 'Withdrawals',
                'url'      => route('withdrawals.index'),
                'icon'     => 'fa fa-money-bill-wave',
                'isActive' => request()->is('account/withdrawals'),
            ];
        }
    } catch (Exception $e) {
        // Route doesn't exist, skip
    }

    try {
        if (!$myAccountItems->pluck('name')->contains('Bank Details') && Route::has('bank.edit')) {
            $accountMenu['My Account'][] = [
                'name'     => 'Bank Details',
                'url'      => route('bank.edit'),
                'icon'     => 'fa fa-university',
                'isActive' => request()->is('account/bank-details'),
            ];
        }
    } catch (Exception $e) {
        // Route doesn't exist, skip
    }
    
    $excludedItems = [
        'My listings',
        'Pending approval',
        'Archived listings',
        'Favourite listings'
    ];
@endphp

<aside>
    <div class="inner-box">
        <div class="user-panel-sidebar">
            @if ($accountMenu->isNotEmpty())
                @foreach($accountMenu as $group => $menu)
                    @php
                        $boxId = \Illuminate\Support\Str::slug($group);
                    @endphp
                    <div class="collapse-box">
                        <h5 class="collapse-title no-border">
                            {{ $group }}&nbsp;
                            <a href="#{{ $boxId }}" data-bs-toggle="collapse" class="float-end"><i class="fa fa-angle-down"></i></a>
                        </h5>
                        <div class="panel-collapse collapse show" id="{{ $boxId }}">
                            <ul class="acc-list">
                                @if(is_array($menu) || $menu instanceof \Illuminate\Support\Collection)
                                    @foreach($menu as $key => $value)
                                        @if(is_array($value) && isset($value['name']))
                                            @php
                                                $itemName = trim(strip_tags($value['name']));
                                            @endphp
                                            @continue(in_array($itemName, $excludedItems))

                                            <li>
                                                <a {!! ($value['isActive'] ?? false) ? 'class="active"' : '' !!} href="{{ $value['url'] ?? '#' }}">
                                                    <i class="{{ $value['icon'] ?? 'fa fa-circle' }}"></i> {{ $value['name'] }}
                                                    @if (!empty($value['countVar']))
                                                        <span class="badge badge-pill{{ $value['cssClass'] ?? '' }}">
                                                            {{ \App\Helpers\Number::short($value['countVar']) }}
                                                        </span>
                                                    @endif
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</aside>