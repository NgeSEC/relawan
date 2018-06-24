@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <h2>Frequently Asked Question</h2>
        <div id="faqlist">
          <div class="tab">
            <input id="tab-one" type="checkbox" name="tabs">
            <label for="tab-one">Apakah posko.id itu?</label>
            <div class="tab-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
            </div>
          </div>
          <div class="tab">
            <input id="tab-two" type="checkbox" name="tabs">
            <label for="tab-two">Mengapa kita harus berkontribusi?</label>
            <div class="tab-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
            </div>
          </div>
          <div class="tab">
            <input id="tab-three" type="checkbox" name="tabs">
            <label for="tab-three">Bagaimana cara mencari data?</label>
            <div class="tab-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
