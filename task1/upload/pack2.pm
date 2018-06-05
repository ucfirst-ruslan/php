#!/usr/bin/perl

package Packages::pack2;

use Data::Dumper;

use strict;
use warnings;

my $self;

sub new
{
    my $class = ref($_[0]) || $_[0];
    $self ||= bless({}, $class);

    return $self;
}

sub run
{
    my ($self) = @_;
    my $obj = Packages::pack1->new();
    $obj->get();

}

sub test
{

    print "\n test \n";
}

1;