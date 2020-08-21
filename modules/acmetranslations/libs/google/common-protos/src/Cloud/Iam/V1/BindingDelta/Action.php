<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/iam/v1/policy.proto

namespace Google\Cloud\Iam\V1\BindingDelta;

/**
 * The type of action performed on a Binding in a policy.
 *
 * Protobuf type <code>google.iam.v1.BindingDelta.Action</code>
 */
class Action
{
    /**
     * Unspecified.
     *
     * Generated from protobuf enum <code>ACTION_UNSPECIFIED = 0;</code>
     */
    const ACTION_UNSPECIFIED = 0;
    /**
     * Addition of a Binding.
     *
     * Generated from protobuf enum <code>ADD = 1;</code>
     */
    const ADD = 1;
    /**
     * Removal of a Binding.
     *
     * Generated from protobuf enum <code>REMOVE = 2;</code>
     */
    const REMOVE = 2;
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Action::class, \Google\Cloud\Iam\V1\BindingDelta_Action::class);
