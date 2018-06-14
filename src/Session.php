<?php

namespace SetBased\Abc\Session;

/**
 * Interface for classes for session handling.
 */
interface Session
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns stateful double submit token to prevent CSRF attacks.
   *
   * @return string
   */
  public function getCsrfToken(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of preferred language of the user of the current session.
   *
   * @return int
   */
  public function getLanId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the profile of the user of the current session.
   *
   * @return int
   */
  public function getProId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the current session.
   *
   * @return int|null
   */
  public function getSesId(): ?int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the session token.
   *
   * @return string
   */
  public function getSessionToken(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the user of the current session.
   *
   * @return int
   */
  public function getUsrId(): int;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns true if the user is anonymous (i.e. not a user who has logged in). Otherwise, returns false.
   *
   * @return bool
   */
  public function isAnonymous(): bool;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Updates the session that an user has successfully logged in.
   *
   * @param int $usrId The ID the user.
   *
   * @return void
   */
  public function login($usrId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Terminates the current session.
   *
   * @return void
   */
  public function logout(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Saves the current state op the session.
   *
   * @return void
   */
  public function save(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Changes the language of the current session.
   *
   * @param int $lanId The ID of the new language.
   *
   * @return void
   */
  public function setLanId(int $lanId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Creates a session or resumes the current session based on the session cookie.
   *
   * @return void
   */
  public function start(): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
