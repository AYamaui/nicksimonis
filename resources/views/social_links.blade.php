<ul class="sm_links">
    @foreach($social_links as $social_link)
    <li>
        {!!HTML::link(App\Configuration::get($social_link.'_link'), '', ['class'=>'icon-social icon-'.$social_link, 'title'=>$social_link, 'target'=>'_blank'])!!}
    </li>
    @endforeach
    @if($contact)
    <a href="#" class="mail">Mail me</a>
    @endif
</ul>