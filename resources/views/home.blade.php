@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 d-xl-flex flex-column justify-content-xl-start align-items-xl-start">
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center"
                    style="background: rgba(248,249,250,0.62);width: 100%;padding: 16px;border-radius: 10px;"><i
                        class="fab fa-whatsapp text-dark" style="font-size: 64px;margin-right: 16px;"></i>
                    <h1 class="text-dark" style="margin: 0;">ChatApp</h1>
                </div>
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center"
                    style="width: 100%;margin: 0px;margin-top: 16px;background: rgba(248,249,250,0.62);padding: 16px;border-radius: 10px;">
                    <p style="margin: 0;margin-right: 16px;">{{ Auth::user()->username }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-dark" type="submit">Logout</button>
                    </form>
                </div>

                <div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start"
                    style="width: 100%;margin: 0px;margin-top: 16px;background: rgba(248,249,250,0.62);padding: 16px;border-radius: 10px;">
                    @foreach ($users as $user)
                        @if ($user->id != Auth::user()->id)
                            <a href="/home/chat?id={{ $user->id }}"
                                class="btn btn-dark w-100 my-2">{{ $user->username }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            @isset($chat)
                <div class="col-8" style="height: 100vh;background: rgba(248,249,250,0.62);border-radius: 10px;">
                    <div class="overflow-auto" id="messages" style="height: 90%;">
                        @foreach ($chat as $msg)
                            @if ($msg->sentBy == Auth::user()->id)
                                <div class="w-100 d-flex justify-content-end p-2">
                                    <p class="w-50 bg-primary text-light py-2 px-3 rounded-5">{{ $msg->message }}</p>
                                </div>
                            @else
                                <div class="w-100 d-flex justify-content-start p-2">
                                    <p class="w-50 bg-secondary py-2 px-3 rounded-5">{{ $msg->message }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-end p-2" style="height: 10%;">
                        <form method="POST" action="{{ route('sendMsg') }}"
                            class="d-xl-flex justify-content-xl-center align-items-xl-center" style="width: 100%;">
                            @csrf
                            <input type="hidden" name="receivedBy" value="{{ $receiverId }}" />
                            <input class="form-control" type="text" name="message" placeholder="Message" />
                            <button class="btn btn-success" type="submit" style="padding-right: 16px;padding-left: 16px;">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection
