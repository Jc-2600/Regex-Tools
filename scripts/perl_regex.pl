#!/usr/bin/perl

use strict;
use warnings;

my $t = time;
my $ok = 0;
my $no = 0;


open(my $f, "<../files/results.out") or die("no file");

while(<$f>){
  chomp;
  #1879-04-07,Wales,Scotland,0,3,Friendly,Wrexham,Wales,FALSE
  if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/){
    if($5 > $4){
      printf("%s: %s (%d) - (%d) %s \n",
        $1, $2, $4, $5, $3
      );
    }
    $ok++;
  }else{
    $no++;
  }
}


printf("Se encontraron %d mathces \n - %d no matches \ntardo %d segundos", $ok, $no, time()-$t);
close($f);

