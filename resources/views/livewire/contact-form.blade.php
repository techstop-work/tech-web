<div>
    @if($success)
        <div class="success-animation text-center" style="animation: fadeInUp 0.8s ease-out;" id="success-message">
            <div class="success-icon" style="font-size: 4rem; color: #28a745; margin-bottom: 1rem;">
                <i class="fa fa-check-circle"></i>
            </div>
            <h3 style="color: #28a745; margin-bottom: 1rem;">Message Sent Successfully!</h3>
            <p style="margin-bottom: 2rem;">Thank you for contacting TechStop. A representative will get back to you soon.</p>
            <button wire:click="sendAnother" class="btn btn-primary solid">Send Another Message</button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="contact-form" style="transition: all 0.3s ease;">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" wire:model.defer="name" required placeholder="Enter your full name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" type="tel" wire:model.defer="phone" placeholder="Enter your phone number (optional)">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Subject</label>
                        <select class="form-control" wire:model.defer="subject" required>
                            <option value="">Choose a subject for your message</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Business Website">Business Website</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Cloud Services">Cloud Services</option>
                            <option value="SEO Services">SEO Services</option>
                            <option value="DevOps">DevOps</option>
                            <option value="API Integration">API Integration</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                        @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" wire:model.defer="email" required placeholder="Enter your email address">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" wire:model.defer="message" rows="10" required placeholder="Type your message here "></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="text-right"><br>
                <button class="btn btn-primary solid blank submit-btn" type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove>Send Message</span>
                </button>
            </div>
        </form>
    @endif
</div>

