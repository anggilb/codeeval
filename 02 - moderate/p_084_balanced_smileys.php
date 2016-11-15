<?php

class balancedSmileys {
    public function getValue($input) {
        $input = str_replace(array('(:)', ':)', ':('), '', $input);
        return (preg_match('/^(([a-z :]|\((?1)\))*)$/', $input)) ? 'YES' : 'NO';
    }
}
 
$class = new balancedSmileys();

$input = array(
':((',
'i am sick today (:()',
'(:)',
'hacker cup: started :):)',
')(');

$input = array(
'(:)',
')(',
'cabbbc(aacb)( :b(ccc)(ca(:))cc(()(b:aabcbbc):c(cb)::)cb()bac)caa:)a(:(c(:bb:c()(:c)b(bbbcb)::)ac)::a',
'ac) b:(c ((:b::)(:( :bb(a(aba(::):::)c)cc(c:(bbabacbc:c):: :)a c::)ba)()(bcbcaca:()c)',
'i am sick today (:()',
'b::b::c)a:babaaa)aaabac)b:cbc)::cccab(caab):a()b((b(c))acb)(cb((c:cb:(cb)b: ))(a(( ac)))b',
'b:aacbb((:)aab:bbbabc:bbb()a(b)):c)c:ac:(:)c)c()b (:(:abbabcbbc(): :c(b( acca)b:c)a)a)cca',
'cc(c):c:a:)b:ccbcb(b::)a(b:caac b):c:(aabb)aab( ()a()b(c))c(b()(:ab(:a((cab:)()a))(c))aaaab)c',
':((',
'ab((bac:cacb:b)(b(bcbc:: ):aaac(ccc:b:a)b:a:c))abc:):c(ab:cbc(cbbb ::a ca: :aa))(c:cb a)cc',
'(:a))',
'c ab:(:()cc(bb a()cbc(:bb ccc:a a:(a)(:a( aac)c(b)aac:a:a:ac(:a)bb)b:a(c(:a))caa :(c:::c:ca ):a',
'hacker cup: started :):)',
'aa:aa()):c)):)ca:ccc)cc))b ))(c)):a(ba::: cac( ))(:bc:bcbcc(c::a(acacc)) b: :c(a)a b)bbb',
'bb(a(a :aa(c:(aba aaaa)(cb:bb:a))cb(ba::ac)acc:a(c:(aacbcc:c)b::)b:c)() (cb)ccbccb',
'((:aac(:a:a((cbab :b:)a(a(cac(:( cbbacc:()))bb()a):bcaab((aaabb(a()):bb:))a:)::  a)a) a():((:bcb)',
'b:b c((:((ac)))(::a(:)(a:ac(acbac cc:b) (c :(::(b()(abc:(a)  aab))b()b:cb))bab a aba',
'c(aa:aac:bb) b()a: cbc(:)b(ccb)ac:ccb)c(:::c:(a)a (ba)b(a(:b)cc())(ab(caabcb:)aac)a:b:aaaac',
'a(b)c: b::baca:)((:( c(b): b :(cab:a(()(ba (acc)(ab)cac():(aa:c::c()bcc))ba)bc)a:(:c)a(c)):bbb)a',
'c:(a:b()bab(:cbaa(a(aac() a):b:(a):c)(:acca(a)))cacc(c:bc::b(b  cb)a()a)ab:ba)b:'
)
;

foreach ($input as $line) {
    echo $class->getValue($line).PHP_EOL;
}
