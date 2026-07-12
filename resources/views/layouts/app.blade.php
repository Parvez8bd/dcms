<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Include head --}}
        @include('layouts.partials.head')
    </head>

    <body>
        <div id="app">
            {{-- include sidebar --}}
            @include('layouts.partials.sidebar')

            <div class="mainbar">
                {{-- include top navigation --}}
                @include('layouts.navigation')

                {{-- error handler area --}}
                <div class="container">
                    @if(session()->has('success'))
                        <x-alert-component :messages="session()->get('success')"/>
                    @else
                        @if ($errors->any())
                            <x-alert-component type="danger" :messages="$errors->all()"/>
                        @endif
                    @endif
                </div>

                <!-- Page Content -->
                {{ $slot }}
            </div>
            
            {{-- include scripts --}}
            @include('layouts.partials.scripts')
        </div>
    </body>
</html>
