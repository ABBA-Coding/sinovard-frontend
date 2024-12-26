@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="contact-section__img">
                            <img src="/frontend/images/png/contact.png" alt="" />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-9">
                        <div class="contact-section__wrapper">
                            <div class="contact-section__info">
                                @if(!empty($setting->email))
                                <div class="contact-section__box">
                                    <div class="contact-section__title">{{ __('static.Почта') }}:</div>
                                    <a href="mailto:{{$setting->email}}" class="contact-section__link">
                                        {{ $setting->email }}
                                    </a>
                                </div>
                                @endif
                                @if(count($setting->phones))
                                <div class="contact-section__box">
                                    <div class="contact-section__title">{{ __('static.Номер телефона') }}:</div>
                                    @foreach($setting->phones as $phone)
                                        <a href="tel:@phone($phone)" class="contact-section__link mb-10">
                                            {{ $phone }}
                                        </a>
                                    @endforeach
                                </div>
                                @endif
                                @if(!empty($setting->address))
                                <div class="contact-section__box">
                                    <div class="contact-section__title">{{ __('static.Адрес') }}:</div>
                                    <a href="#!" class="contact-section__link">
                                        {{ $setting->address[$lang] }}
                                    </a>
                                </div>
                                @endif
                                <div class="contact-section__box">
                                    <div class="contact-section__title">{{ __('static.Наши соц.сети') }}:</div>
                                    <ul class="contact-section__list">
                                        @if(!empty($setting->telegram))
                                            <li>
                                                <a href="{{ $setting->telegram }}" target="_blank" class="contact-section__icon">
                                                    <img src="/frontend/images/icon/social1.svg" alt="" />
                                                </a>
                                            </li>
                                        @endif
                                        @if(!empty($setting->youtube))
                                            <li>
                                                <a href="{{ $setting->youtube }}" target="_blank" class="contact-section__icon">
                                                    <img src="/frontend/images/icon/social2.svg" alt="" />
                                                </a>
                                            </li>
                                        @endif
                                        @if(!empty($setting->facebook))
                                            <li>
                                                <a href="{{ $setting->facebook }}" target="_blank" class="contact-section__icon">
                                                    <img src="/frontend/images/icon/social3.svg" alt="" />
                                                </a>
                                            </li>
                                        @endif
                                        @if(!empty($setting->instagram))
                                            <li>
                                                <a href="{{ $setting->instagram }}" target="_blank" class="contact-section__icon">
                                                    <img src="/frontend/images/icon/social4.svg" alt="" />
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <form action="{{ route('feedback') }}" method="POST" class="form-form feedbackForm">
                                <input type="hidden" name="type" value="1">

                                <div class="contact-form__box">
                                    <input type="text"
                                           name="name"
                                           required
                                           autocomplete="off"
                                           placeholder="{{ __('static.Имя') }}"
                                           class="contact-form__input"/>
                                </div>
                                <div class="contact-form__box">
                                    <input
                                        type="text"
                                        name="company"
                                        autocomplete="off"
                                        placeholder="{{ __('static.Компания') }}"
                                        class="contact-form__input"/>
                                </div>
                                <div class="contact-form__box">
                                    <input
                                        type="text"
                                        name="phone"
                                        required
                                        autocomplete="off"
                                        placeholder="{{ __('static.Номер телефона') }}"
                                        class="contact-form__input"/>
                                </div>
                                <button type="submit" class="btn btn-main">
                                    <span>Связаться</span>
                                </button>
                            </form>
                        </div>
                        <div class="contact-section__map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24019.19565802532!2d69.1520685!3d41.191264!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae612de33bf27b%3A0x137f125e9a298359!2sSinoward!5e0!3m2!1sru!2s!4v1735030803846!5m2!1sru!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
