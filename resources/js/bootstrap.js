import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
// 追加
// クロスオリジンのリクエストで、クッキーや認証情報（セッションクッキーなど）をリクエストに含める設定
axios.defaults.withCredentials = true;
// サーバーが要求する CSRF トークン（通常はクッキーに保存されている）をリクエストヘッダーに自動的に追加する設定
axios.defaults.withXSRFToken = true;


