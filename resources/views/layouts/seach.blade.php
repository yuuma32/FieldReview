<form action="{{ route('home') }}" method="GET">
    <div class="search-bar flex justify-center items-center p-2 mx-auto rounded">
        <input type="text" name="search"  placeholder="フィールド名" value="{{ request('search') }}" class="w-80 p-2 mr-2 rounded">
        <button type="submit" class="font-semibold py-2 px-4 bg-lime-600 text-white hover:bg-lime-700 rounded">検索</button>
    </div>
    <div class="bg-white shadow my-2 mx-auto rounded">
        <h2 class="text-xl font-bold ml-4">エリアの絞り込み</h2>
        <div class="sm:flex justify-center items-center p-2">
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="hokkaido-touhoku">北海道・東北</h3>
                <div id="hokkaido-touhoku" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="北海道" {{ in_array('北海道', request('prefecture', [])) ? 'checked' : '' }}>北海道</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="青森県" {{ in_array('青森県', request('prefecture', [])) ? 'checked' : '' }}>青森県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="岩手県" {{ in_array('岩手県', request('prefecture', [])) ? 'checked' : '' }}>岩手県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="宮城県" {{ in_array('宮城県', request('prefecture', [])) ? 'checked' : '' }}>宮城県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="秋田県" {{ in_array('秋田県', request('prefecture', [])) ? 'checked' : '' }}>秋田県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="山形県" {{ in_array('山形県', request('prefecture', [])) ? 'checked' : '' }}>山形県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="福島県" {{ in_array('福島県', request('prefecture', [])) ? 'checked' : '' }}>福島県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="kanto">関東</h3>
                <div id="kanto" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="茨城県" {{ in_array('茨城県', request('prefecture', [])) ? 'checked' : '' }}>茨城県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="栃木県" {{ in_array('栃木県', request('prefecture', [])) ? 'checked' : '' }}>栃木県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="群馬県" {{ in_array('群馬県', request('prefecture', [])) ? 'checked' : '' }}>群馬県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="埼玉県" {{ in_array('埼玉県', request('prefecture', [])) ? 'checked' : '' }}>埼玉県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="千葉県" {{ in_array('千葉県', request('prefecture', [])) ? 'checked' : '' }}>千葉県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="東京都" {{ in_array('東京都', request('prefecture', [])) ? 'checked' : '' }}>東京都</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="神奈川県" {{ in_array('神奈川県', request('prefecture', [])) ? 'checked' : '' }}>神奈川県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="chubu">中部</h3>
                <div id="chubu" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="新潟県" {{ in_array('新潟県', request('prefecture', [])) ? 'checked' : '' }}>新潟県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="富山県" {{ in_array('富山県', request('prefecture', [])) ? 'checked' : '' }}>富山県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="石川県" {{ in_array('石川県', request('prefecture', [])) ? 'checked' : '' }}>石川県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="福井県" {{ in_array('福井県', request('prefecture', [])) ? 'checked' : '' }}>福井県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="山梨県" {{ in_array('山梨県', request('prefecture', [])) ? 'checked' : '' }}>山梨県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="長野県" {{ in_array('長野県', request('prefecture', [])) ? 'checked' : '' }}>長野県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="岐阜県" {{ in_array('岐阜県', request('prefecture', [])) ? 'checked' : '' }}>岐阜県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="静岡県" {{ in_array('静岡県', request('prefecture', [])) ? 'checked' : '' }}>静岡県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="愛知県" {{ in_array('愛知県', request('prefecture', [])) ? 'checked' : '' }}>愛知県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="kinki">近畿</h3>
                <div id="kinki" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="三重県" {{ in_array('三重県', request('prefecture', [])) ? 'checked' : '' }}>三重県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="滋賀県" {{ in_array('滋賀県', request('prefecture', [])) ? 'checked' : '' }}>滋賀県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="京都府" {{ in_array('京都府', request('prefecture', [])) ? 'checked' : '' }}>京都府</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="大阪府" {{ in_array('大阪府', request('prefecture', [])) ? 'checked' : '' }}>大阪府</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="兵庫県" {{ in_array('兵庫県', request('prefecture', [])) ? 'checked' : '' }}>兵庫県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="奈良県" {{ in_array('奈良県', request('prefecture', [])) ? 'checked' : '' }}>奈良県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="和歌山県" {{ in_array('和歌山県', request('prefecture', [])) ? 'checked' : '' }}>和歌山県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="china">中国</h3>
                <div id="china" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="鳥取県" {{ in_array('鳥取県', request('prefecture', [])) ? 'checked' : '' }}>鳥取県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="島根県" {{ in_array('島根県', request('prefecture', [])) ? 'checked' : '' }}>島根県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="岡山県" {{ in_array('岡山県', request('prefecture', [])) ? 'checked' : '' }}>岡山県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="広島県" {{ in_array('広島県', request('prefecture', [])) ? 'checked' : '' }}>広島県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="山口県" {{ in_array('山口県', request('prefecture', [])) ? 'checked' : '' }}>山口県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
                <h3 class="area-toggle" data-target="shikoku">四国</h3>
                <div id="shikoku" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="徳島県" {{ in_array('徳島県', request('prefecture', [])) ? 'checked' : '' }}>徳島県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="香川県" {{ in_array('香川県', request('prefecture', [])) ? 'checked' : '' }}>香川県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="愛媛県" {{ in_array('愛媛県', request('prefecture', [])) ? 'checked' : '' }}>愛媛県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="高知県" {{ in_array('高知県', request('prefecture', [])) ? 'checked' : '' }}>高知県</label>
                </div>
            </div>
            <div class="mx-2 mb-2">
            <h3 class="area-toggle" data-target="kyushu">九州</h3>
                <div id="kyushu" class="prefecture-group" style="display: none;">
                    <label class="block"><input type="checkbox" name="prefecture[]" value="福岡県" {{ in_array('福岡県', request('prefecture', [])) ? 'checked' : '' }}>福岡県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="佐賀県" {{ in_array('佐賀県', request('prefecture', [])) ? 'checked' : '' }}>佐賀県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="長崎県" {{ in_array('長崎県', request('prefecture', [])) ? 'checked' : '' }}>長崎県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="熊本県" {{ in_array('熊本県', request('prefecture', [])) ? 'checked' : '' }}>熊本県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="大分県" {{ in_array('大分県', request('prefecture', [])) ? 'checked' : '' }}>大分県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="宮崎県" {{ in_array('宮崎県', request('prefecture', [])) ? 'checked' : '' }}>宮崎県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="鹿児島県" {{ in_array('鹿児島県', request('prefecture', [])) ? 'checked' : '' }}>鹿児島県</label>
                    <label class="block"><input type="checkbox" name="prefecture[]" value="沖縄県" {{ in_array('沖縄県', request('prefecture', [])) ? 'checked' : '' }}>沖縄県</label>
                </div>
            </div>
        </div>
        <div class="p-3">
            <button type="submit" class="font-semibold py-2 px-4 mx-auto bg-green-600 text-white hover:bg-green-700 rounded">絞り込み</button>
            <button type="reset" class="font-semibold py-2 px-4 mx-auto bg-red-500 text-white hover:bg-red-600 rounded">条件リセット</button>
        </div>
    </div>
    </form>