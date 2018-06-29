<?php

namespace SetBased\Abc\Session;

/**
 * Interface for classes for session handling.
 */
interface Session
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Shared lock mode for named sections of a session.
   */
  const SECTION_SHARED = 1;

  /**
   * Exclusive lock mode for named sections of a session.
   */
  const SECTION_EXCLUSIVE = 2;

  /**
   * Read-Only mode for named sections of a session.
   */
  const SECTION_READ_ONLY = 3;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns stateful double submit token to prevent CSRF attacks.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getCsrfToken(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of preferred language of the user of the current session.
   *
   * @return int
   *
   * @since 1.0.0
   * @api
   */
  public function getLanId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns a reference to the data of a named section of the session.
   *
   * If the named section does not yet exists a reference to null is returned. Only named sections opened in shared
   * and exclusive mode will be saved by @see save.
   *
   * @param string $name The name of the named section.
   * @param int    $mode The mode for getting the named section.
   *
   * @return mixed
   *
   * @since 1.0.0
   * @api
   */
  public function &getNamedSection(string $name, int $mode);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the profile of the user of the current session.
   *
   * @return int
   *
   * @since 1.0.0
   * @api
   */
  public function getProId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the current session.
   *
   * @return int|null
   *
   * @since 1.0.0
   * @api
   */
  public function getSesId(): ?int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the session token.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getSessionToken(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the user of the current session.
   *
   * @return int
   *
   * @since 1.0.0
   * @api
   */
  public function getUsrId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns true if the user is anonymous (i.e. not a user who has logged in). Otherwise, returns false.
   *
   * @return bool
   *
   * @since 1.0.0
   * @api
   */
  public function isAnonymous(): bool;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Updates the session that an user has successfully logged in.
   *
   * @param int $usrId The ID the user.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function login(int $usrId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Terminates the current session.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function logout(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Saves the current state of the session.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function save(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Changes the language of the current session.
   *
   * @param int $lanId The ID of the new language.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function setLanId(int $lanId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Creates a session or resumes the current session based on the session cookie.
   *
   * @return void
   *
   * @since 1.0.0
   * @api
   */
  public function start(): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
