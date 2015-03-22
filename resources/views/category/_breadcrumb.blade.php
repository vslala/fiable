

    <ol class="breadcrumb">
    @foreach($breadcrumbs as $breadcrumb)
        <li><label class="label {{ $breadcrumb['class'] or "label-default" }}">{{ $breadcrumb['link'] }}</label> </li>
    @endforeach
    </ol>