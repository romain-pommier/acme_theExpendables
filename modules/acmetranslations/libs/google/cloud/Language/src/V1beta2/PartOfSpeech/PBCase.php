<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/language/v1beta2/language_service.proto

namespace Google\Cloud\Language\V1beta2\PartOfSpeech;

/**
 * The grammatical function performed by a noun or pronoun in a phrase,
 * clause, or sentence. In some languages, other parts of speech, such as
 * adjective and determiner, take case inflection in agreement with the noun.
 *
 * Protobuf type <code>google.cloud.language.v1beta2.PartOfSpeech.Case</code>
 */
class PBCase
{
    /**
     * Case is not applicable in the analyzed language or is not predicted.
     *
     * Generated from protobuf enum <code>CASE_UNKNOWN = 0;</code>
     */
    const CASE_UNKNOWN = 0;
    /**
     * Accusative
     *
     * Generated from protobuf enum <code>ACCUSATIVE = 1;</code>
     */
    const ACCUSATIVE = 1;
    /**
     * Adverbial
     *
     * Generated from protobuf enum <code>ADVERBIAL = 2;</code>
     */
    const ADVERBIAL = 2;
    /**
     * Complementive
     *
     * Generated from protobuf enum <code>COMPLEMENTIVE = 3;</code>
     */
    const COMPLEMENTIVE = 3;
    /**
     * Dative
     *
     * Generated from protobuf enum <code>DATIVE = 4;</code>
     */
    const DATIVE = 4;
    /**
     * Genitive
     *
     * Generated from protobuf enum <code>GENITIVE = 5;</code>
     */
    const GENITIVE = 5;
    /**
     * Instrumental
     *
     * Generated from protobuf enum <code>INSTRUMENTAL = 6;</code>
     */
    const INSTRUMENTAL = 6;
    /**
     * Locative
     *
     * Generated from protobuf enum <code>LOCATIVE = 7;</code>
     */
    const LOCATIVE = 7;
    /**
     * Nominative
     *
     * Generated from protobuf enum <code>NOMINATIVE = 8;</code>
     */
    const NOMINATIVE = 8;
    /**
     * Oblique
     *
     * Generated from protobuf enum <code>OBLIQUE = 9;</code>
     */
    const OBLIQUE = 9;
    /**
     * Partitive
     *
     * Generated from protobuf enum <code>PARTITIVE = 10;</code>
     */
    const PARTITIVE = 10;
    /**
     * Prepositional
     *
     * Generated from protobuf enum <code>PREPOSITIONAL = 11;</code>
     */
    const PREPOSITIONAL = 11;
    /**
     * Reflexive
     *
     * Generated from protobuf enum <code>REFLEXIVE_CASE = 12;</code>
     */
    const REFLEXIVE_CASE = 12;
    /**
     * Relative
     *
     * Generated from protobuf enum <code>RELATIVE_CASE = 13;</code>
     */
    const RELATIVE_CASE = 13;
    /**
     * Vocative
     *
     * Generated from protobuf enum <code>VOCATIVE = 14;</code>
     */
    const VOCATIVE = 14;
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PBCase::class, \Google\Cloud\Language\V1beta2\PartOfSpeech_Case::class);

