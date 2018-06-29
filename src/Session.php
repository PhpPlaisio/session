<?php

namespace SetBased\Abc\Session;

/**
 * Interface for classes for session handling.
 */
interface Session
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Exclusive lock mode for named section of a session.
   */
  const NAMED_LOCKED = 1;

  /**
   * Shared lock mode for named section of a session.
   */
  const NAMED_SHARED = 2;

  /**
   * First come, first serve mode for named section of a session.
   */
  const NAMED_FIRST_COME_FIRST_SERVED = 3;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Deletes a named section of the session.
   *
   * @param string $name The name of the named section.
   */
  public function delNamedSession(string $name): void;

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
   * Gets a named section of the session. If such named section does not yet exists an empty array is returned.
   *
   * @param string $name The name of the named section.
   * @param int    $mode The locke mode.
   *
   * @return array
   */
  public function getNamedSection(string $name, int $mode): array;

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
  public function login(int $usrId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Terminates the current session.
   *
   * @return void
   */
  public function logout(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Stores a named section of the session.
   *
   * Normally will return true. However, in NAMED_FIRST_COME_FIRST_SERVED mode will return false when the named section
   * of the session could not be updated (due to some other request has updated the named section before).
   *
   * @param string     $name  The name of the named section.
   * @param array|null $value The value of the named section of the session. A null value will delete the named section
   *                          of the session.
   *
   * @return bool
   */
  public function putNamedSection(string $name, ?array $value): bool;

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
