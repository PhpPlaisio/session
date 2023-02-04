<?php
declare(strict_types=1);

namespace Plaisio\Session;

/**
 * Interface for classes for session handling.
 *
 * @property-read int $proId The ID of the profile of the user of the current session.
 * @property-read int $sesId The ID of the current session.
 * @property-read int $usrId The ID of the user of the current session.
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
   * Destroys all sessions of the current user.
   */
  public function destroyAllSessions(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Destroys all sessions of another user.
   *
   * @param int $usrId The ID of the other user.
   */
  public function destroyAllSessionsOfUser(int $usrId): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Destroys all other sessions of the current user.
   */
  public function destroyOtherSessions(): void;

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
   * Returns true if and only if there are one or more flash messages saved in the current sessions.
   *
   * @return bool
   */
  public function getHasFlashMessage(): bool;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of preferred language of the user of the current session.
   *
   * The method SHOULD only be used to set the language of the Babel object. Use the Babel object for getting the ID
   * of the language.
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
   * If the named section does not yet exist a reference to null is returned. Only named sections opened in shared
   * and exclusive mode will be saved by @param string $name The name of the named section.
   *
   * @param int $mode The mode for getting the named section.
   *
   * @return mixed
   *
   * @see   save.
   *
   * @since 1.0.0
   * @api
   */
  public function &getNamedSection(string $name, int $mode): mixed;

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
   * Updates the session that a user has successfully logged in.
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
   * Sets whether the current session has one or more flash messages.
   *
   * @param bool $hasFlashMessage If and only if true the current session has on or more flash messages.
   *
   * @return void
   */
  public function setHasFlashMessage(bool $hasFlashMessage): void;

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
