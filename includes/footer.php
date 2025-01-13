<section class="footerSection">
    <div class="contentContainer container">
        <div class="footerIntro">
            <div class="footerLogoDiv">
                <span class="hotelName">
                    BolluBerry<span>..</span>
                </span>
            </div>
            <p class="footer-description">BolluBerry adalah sebuah website yang menawarkan pengiriman berbagai jenis Kue.</p>

            <div class="footContactDetails">
                <div class="info">
                    <div class="iconDiv"><i class='bx bx-mail-send'></i></div>
                    <span class="contact-info">BolluBerry@gmail.com</span>
                </div>

                <div class="info">
                    <div class="iconDiv"><i class='bx bxs-phone-outgoing'></i></div>
                    <span class="contact-info">+62896373761194</span>
                </div>

                <div class="info">
                    <div class="iconDiv"><i class='bx bx-current-location'></i></div>
                    <span class="contact-info">jl.Lari Dari Keputusasaan</span>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    /* General Footer Styling */
    .footerSection {
        background-color: #f8c8d9; /* Soft pink background */
        padding: 40px 0;
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    .footerIntro {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .footerLogoDiv .hotelName {
        font-size: 36px;
        color: #e91e63; /* Pink color */
        font-weight: bold;
    }

    .footerLogoDiv .hotelName span {
        font-size: 40px;
        color: #ff66b2;
    }

    .footer-description {
        font-size: 18px;
        color: #555;
        margin-top: 10px;
        font-style: italic;
    }

    .footContactDetails {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .info {
        margin: 0 15px;
        display: flex;
        align-items: center;
    }

    .iconDiv {
        background-color: #ff66b2; /* Light pink background for icons */
        border-radius: 50%;
        padding: 10px;
        margin-right: 10px;
    }

    .iconDiv i {
        color: white;
        font-size: 24px;
    }

    .contact-info {
        font-size: 16px;
        color: #333;
    }

    .contact-info:hover {
        color: #e91e63; /* Hover effect with darker pink */
        text-decoration: underline;
    }

    /* Responsive styling */
    @media only screen and (max-width: 768px) {
        .footerIntro {
            padding: 0 20px;
        }

        .footContactDetails {
            flex-direction: column;
            align-items: center;
        }

        .info {
            margin-bottom: 15px;
        }
    }
</style>
