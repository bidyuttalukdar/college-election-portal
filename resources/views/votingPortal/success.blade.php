@extends('layouts.votingPortal.layouts_voting_portal')
@section('title','Welcome to GU ELection | Register Your Vote')
@section('css_content')
<style>
    i.success {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    i.cancel {
        color: red;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
</style>
@endsection
@section('votingPortal')
<section>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 mt-4">
            <div class="card mt-5 mb-4">
                <div class="text-center pt-4">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                        <i class="checkmark success">✓</i>
                    </div>
                    <h1 class="color-green">Success</h1> 
                    <p>You have voted successfully <br/> Now You can leave!</p>
                </div>
            </div>
        </div>
    </div>
    <audio src="{{asset('assets/audio/beep.mp3')}}" id="audio" controls style="display: none;"></audio>

</section>
@endsection
@section('js_content')

<script type="text/javascript">
    function playAudio(){
        document.getElementById("audio").play();
    }
    playAudio();
    $(document).ready(function() {
        setTimeout(() => {
            window.location.href='{{ url('/voting/dashboard') }}';
        }, 9000);
    });
</script>
@endsection