<section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <div class="icons-container">

            <div class="icons">
                <img src="imges/icon-1.png" alt="">
                <h3>phone number</h3>
                <p><a href="#" class="fas fa-phone"></a>0 111 475 1979</p>
                <p><a href="#" class="fas fa-phone"></a> 0 111 939 3167</p>
                <p><a href="#" class="fas fa-phone"></a> 0 111 266 1530</p>
                <p><a href="#" class="fas fa-phone"></a> 0 1114828347</p>

            </div>

            <div class="icons">
                <img src="imges/icon-2.png" alt="">
                <h3>email address</h3>
                <p>homeverse@gmail.com</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fas fa-envelope"></a>
                 </div>
            </div>

             <div class="icons">
                <img src="imges/icon-3.png" alt="">
                <h3>office address</h3>
                <p>Cairo Egypt</p>
            </div>

        </div>

        <div class="row">

            <form wire:submit.prevent="submit_form">
                @csrf
                <div class="inputBox">
                    <input wire:model= "Name" type="text" placeholder="name">
                    <input type="number" wire:model="Number" placeholder="number">
                </div>
                <div class="inputBox">
                    <input type="email" wire:model="Email" placeholder="email" >
                    <input type="text" wire:model="Subject" placeholder="subject" >
                </div>
                <textarea name="Message" wire:model="Message" placeholder="message" id="" cols="30" rows="10" ></textarea>
                <input type="submit" value="send message" class="btn">
                @error('Name') {{ $message }} @enderror
                @error('Number') {{ $message }} @enderror
                @error('Email') {{ $message }} @enderror
                @error('Subject') {{ $message }} @enderror
                @error('Message') {{ $message }} @enderror
                  <div class="alert alert-success">
             {{session('ContactSend')}}
                  </div>
            </form>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55251.33563963231!2d31.2934839!3d30.0595581!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1680367197322!5m2!1sar!2seg" width="550" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
