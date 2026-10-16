<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fe; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h2 { color: #1e293b; text-align: center; }
        p { color: #475569; font-size: 16px; line-height: 1.5; }
        .otp-box { background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; font-size: 32px; font-weight: bold; text-align: center; padding: 20px; margin: 30px 0; border-radius: 8px; letter-spacing: 5px; }
        .footer { margin-top: 40px; text-align: center; font-size: 14px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verifikasi Email Anda</h2>
        <p>Halo,</p>
        <p>Terima kasih telah mendaftar di <strong>Smartplus Indonesia</strong>. Untuk menyelesaikan pendaftaran Anda, masukkan kode OTP berikut pada halaman verifikasi:</p>
        
        <div class="otp-box">
            {{ $otp }}
        </div>
        
        <p>Kode ini hanya berlaku selama <strong>10 menit</strong>. Jangan berikan kode ini kepada siapa pun.</p>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} CV. Smartplus Indonesia. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
