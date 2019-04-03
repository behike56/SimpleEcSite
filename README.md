#SimpleEcSIte
##develop-term

###アイデア企画
１〜６は、「product_planning/idea-mvp.md」に記述。

1. アイディア出し
2. ペルソナの作成
3. リーンキャンバスの作成
4. エレベータピッチの作成
5. ユーザーストーリーマッピング
6. MVP(Minimum Viable Product)選定
7. ワイヤーフレームの作成

*７は、`「product_planning/wire-frame/*.png」`に記述。*

##branch
- master
- page
- payment
- account
- future

###master
開発の本流。

###page
主に表示するだけのページを担当。

- トップページ
- 商品詳細ページ
- カート機能
- カートの中身ページ
- テーブル：商品（在庫）テーブル、カートテーブル

###payment
一連の決済機能を担当。

- 住所と発送方法の選択ページ
- 合計金額の表示と支払い方法の選択ページ
- 決済機能（在庫の減少、メールの送信）
- サンクスページ

*テーブル：アカウントテーブル、商品（在庫）テーブル、カートテーブル
*
###account
ログイン機能とアカウント作成機能を担当。

- ログインページ
- ログイン機能
- アカウント登録ページ
- アカウント登録機能

*テーブル：アカウントテーブル*

###future
追加機能を担当。