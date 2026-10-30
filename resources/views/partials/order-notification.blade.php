@auth
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.Echo.private('user.{{ auth()->id() }}')
                .listen('OrderPlaced', (e) => {
                    const old = document.getElementById('order-notification');
                    if (old) old.remove();

                    const wrap = document.createElement('div');
                    wrap.id = 'order-notification';
                    wrap.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.35);display:flex;align-items:center;justify-content:center;z-index:9999';

                    wrap.innerHTML = `
                        <div style="background:#fff;border-radius:8px;width:340px;box-shadow:0 10px 30px rgba(0,0,0,.25);overflow:hidden;font-family:Arial,sans-serif">
                            <div style="background:#f3f4d9;padding:12px 16px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #e5e5d0">
                                <strong>DesuDesu</strong>
                                <button type="button" data-close style="border:0;background:none;font-size:18px;cursor:pointer">×</button>
                            </div>
                            <div style="padding:18px 16px;font-size:14px;color:#222">
                                Order #${e.order_id} telah ditempatkan! Total: Rp ${Number(e.total).toLocaleString('id-ID')}
                            </div>
                            <div style="padding:0 16px 16px;text-align:right">
                                <button type="button" data-close style="padding:6px 18px;border:1px solid #0a66c2;background:#fff;border-radius:4px;cursor:pointer">OK</button>
                            </div>
                        </div>`;

                    wrap.addEventListener('click', function (ev) {
                        if (ev.target === wrap || ev.target.hasAttribute('data-close')) wrap.remove();
                    });

                    document.body.appendChild(wrap);
                    console.log('Order Placed:', e);
                });
        });
    </script>
@endauth
